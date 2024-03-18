import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'

export enum RouteName {
    Main = 'main',
    Dimensions = 'dimensions',
    Edges = 'edges',
    Palette = 'palette',
    Sinks = 'sinks',
    Addons = 'addons',
    Result = 'result',
    NotFound = 'notFound',
}

const routes: Array<RouteRecordRaw> = [
    {
        path: '/',
        name: RouteName.Main,
        meta: { title: 'Home title' },
        //redirect: { name: RouteName.Login },
        component: () => import('@/views/main/main.view.vue')
    },
    {
        path: '/dimensions',
        name: RouteName.Dimensions,
        meta: { title: 'Sites' },
        component: () => import('@/views/edges/edges.view.vue')
    },
    {
        path: '/palette',
        name: RouteName.Palette,
        meta: { title: 'Palette' },
        component: () => import('@/views/palette/palette.view.vue')
    }
]

/*const serviceRoutes: Array<RouteRecordRaw> = [
    {
        path: '/not-found',
        name: RouteName.NotFound,
        meta: { title: 'not found' },
        component: () => import('@/views/system/not-found.view.vue')
        //beforeEnter: optionalAuthRoute,
    },
    {
        path: '/:pathMatch(.*)*',
        name: RouteName.NotFound,
        meta: { title: 'not found' },
        component: () => import('@/views/system/not-found.view.vue')
        //beforeEnter: optionalAuthRoute,
    }
]*/

export default function () {
    return createRouter({
        history: createWebHashHistory(),
        routes
    })
}