#!/bin/python3

import asyncio
import time
import hashlib
import json
import websockets

clients = set()
chatroom = set()

async def register_client( websocket ):
    clients.add( websocket )

async def register_chatroom( websocket, room_id, recipient_id, client_time ):
    for i in chatroom:
        if i[0] == room_id and i[1] == recipient_id:
            return i[2]
    
    session_id = str(room_id) + str(recipient_id) + str(client_time)
    for _ in range(100):
        session_id = hashlib.sha1(session_id.encode("utf-8")).hexdigest()
    
    chatroom_data = (room_id, recipient_id, session_id)
    chatroom.add( chatroom_data )
    return session_id

async def unregister_client( websocket ):
    clients.remove( websocket )

async def serve_client( websocket, path ):
    await register_client( websocket )
    try:
        async for message in websocket:
            data = json.loads( message )
            if data["action"] == "register":
                session_id = await register_chatroom(websocket, data["room_id"], data["recipient_id"], data["time"])
                if session_id == None:
                    await websocket.send(json.dumps(
                        {
                            "action": "registration",
                            "status": False,
                            "session_id": None
                        }
                    ))
                else:
                    await websocket.send(json.dumps(
                        {
                            "action": "registration",
                            "status": True,
                            "session_id": session_id
                        }
                    ))
            elif data["action"] == "send_chat":
                ...
            elif data["action"] == "recv_chat":
                ...
            elif data["action"] == "keep_alive":
                ...
            print(clients, chatroom)
    finally:
        await unregister_client( websocket )


start_server = websockets.serve( serve_client, "127.0.0.1", 5678 )
asyncio.get_event_loop().run_until_complete( start_server )
asyncio.get_event_loop().run_forever()