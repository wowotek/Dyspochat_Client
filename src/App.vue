<template>
  <div id="app">
    <nav
      class="navbar is-dark is-transparent"
      role="navigation"
      aria-label="main navigation"
    >
      <div class="container">
        <div class="navbar-brand" style="padding: 0; margin: 0px">
          <img src="./assets/logo.png" alt="Logo" width="200" height="" />
          <router-link
            role="button"
            class="navbar-burger"
            aria-label="menu"
            aria-expanded="false"
          >
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </router-link>
        </div>
        <div class="navbar-start">
          <router-link class="navbar-item" to="/">
            Home
          </router-link>
          <router-link class="navbar-item" to="/about">
            About
          </router-link>
          <router-link class="navbar-item" to="/support">
            Help & Support
          </router-link>
        </div>
      </div>
    </nav>

    <router-view />

    <footer class="footer has-background-dark has-text-white">
      <div class="container">
        <div class="columns">
          <div class="column">
            <figure class="image">
              <img src="./assets/logo.png" alt="Logo" style="width: 300px;" />
            </figure>
            <span style="position: absolute; bottom: 0;">
              <small>© 2005-2020 Kuycompany. All rights reserved.</small>
            </span>
          </div>
          <div class="column is-one-fifth">
            <h1 class="title is-5 has-text-white mb-5">Help and Support</h1>
            <ul>
              <li class="my-3"><router-link to="/documentation/">Documentation</router-link></li>
              <li class="my-3">
                <router-link to="/documentation/getting-started/">Getting Started</router-link>
              </li>
              <li class="my-3"><router-link to="/documentation/faq">FAQ</router-link></li>
              <li class="my-3">
                <router-link to="/support/common-problem">Common Problems</router-link>
              </li>
              <li class="my-3">
                <router-link to="/support/community">Community Support</router-link>
              </li>
            </ul>
          </div>
          <div class="column is-one-fifth">
            <h1 class="title is-5 has-text-white mb-5">About Us</h1>
            <ul>
              <li class="my-3">
                <router-link to="/about/dyspochat">About Dyspochat</router-link>
              </li>
              <li class="my-3"><router-link to="/about/team">Our Team</router-link></li>
              <li class="my-3"><router-link to="/about/contribute">Contribute</router-link></li>
              <li class="my-3"><router-link to="/about/legal">Legal & Privacy</router-link></li>
            </ul>
          </div>
          <div class="column">
            <h1 class="title is-5 has-text-white mb-5">Contact Us!</h1>
            <form action="">
              <div class="field has-addons">
                <p class="control">
                  <input
                    class="input"
                    type="password"
                    placeholder="Subject, What is this about?"
                  />
                </p>
                <p class="control">
                  <button type="submit" class="button is-warning">
                    >
                  </button>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>