import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: () => import("../views/Home.vue"),
  },
  {
    path: "/about",
    name: "About",
    component: () => import("../views/About.vue"),
    children: [
      {
        path: "contribute",
        component: () => import("../components/AboutContribute.vue")
      },
      {
        path: "dyspochat",
        component: () => import("../components/AboutDyspochat.vue")
      },
      {
        path: "legal",
        component: () => import("../components/AboutLegal.vue")
      },
      {
        path: "team",
        component: () => import("../components/AboutTeam.vue")
      },
    ]
  },
  {
    path: "/documentation",
    name: "Documentation",
    component: () => import("../views/Documentation.vue"),
    children: [
      {
        path: "faq",
        component: () => import("../components/DocumentationFAQ.vue")
      },
      {
        path: "getting-started",
        component: () => import("../components/DocumentationGettingStarted.vue")
      },
    ]
  },
  {
    path: "/support",
    name: "Support",
    component: () =>
      import("../views/Support.vue"),
    children: [
      {
        path: "common-problem",
        component: () => import("../components/SupportCommonProblem.vue")
      },
      {
        path: "community",
        component: () => import("../components/SupportCommunity.vue")
      },
    ]
  },
  
];

const router = new VueRouter({
  routes
});

export default router;
