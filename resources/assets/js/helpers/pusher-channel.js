import Pusher from 'pusher-js';

const pusher = new Pusher(dashboard.pusherKey, {
    authEndpoint: '/pusher/authenticate',
});

const pusherChannel = pusher.subscribe('dashboard');

export default pusherChannel;