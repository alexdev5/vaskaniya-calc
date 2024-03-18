import { createRouter, createWebHashHistory, RouteRecordRaw } from 'vue-router'
import Main from '@/views/main/main.view.vue'
import Edges from '@/views/edges/edges.view.vue'
import Palette from '@/views/palette/palette.view.vue'
import Dimensions from '@/views/dimensions/dimensions.view.vue'
import Sinks from '@/views/sinks/sinks.view.vue'
import Addons from '@/views/addons/addons.view.vue'
import Result from '@/views/result/result.view.vue'

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
        component: Main
    },
    {
        path: '/edges',
        name: RouteName.Edges,
        meta: { title: 'Sites' },
        component: Edges
    },
    {
        path: '/palette',
        name: RouteName.Palette,
        meta: { title: 'Palette' },
        component: Palette
    },
    {
        path: '/dimensions',
        name: RouteName.Dimensions,
        meta: { title: 'Dimensions' },
        component: Dimensions
    },
    {
        path: '/sinks',
        name: RouteName.Sinks,
        meta: { title: 'Sinks' },
        component: Sinks
    },
    {
        path: '/addons',
        name: RouteName.Addons,
        meta: { title: 'Addons' },
        component: Addons
    },
    {
        path: '/result',
        name: RouteName.Result,
        meta: { title: 'Result' },
        component: Result
    },
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