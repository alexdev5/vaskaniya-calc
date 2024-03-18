import mitt from 'mitt'

export enum Events {
    Login = 'loginEvent',
    Logout = 'logoutEvent',
}

const emitter = mitt()

export {
    emitter
}