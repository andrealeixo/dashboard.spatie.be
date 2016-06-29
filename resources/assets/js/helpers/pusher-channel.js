import Pusher from 'pusher-js';

const pusher = new Pusher(dashboard.pusherKey, {
    	cluster: 'ap1',
	authEndpoint: '/pusher/authenticate',
});

const pusherChannel = pusher.subscribe('private-dashboard');

export default pusherChannel;
