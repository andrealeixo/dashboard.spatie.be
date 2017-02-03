import Grid from './grid';
import Pusher from '../mixins/pusher';
import SaveState from '../mixins/save-state';

export default {

    template: `
        <grid :position="grid" modifiers="blue">
            <section class="pos-data priority-{{ priority }}">
                <h1 class="pos-data__title">{{ storeName | capitalize }}</h1>
                <div  class="pos-data__content">
                    {{{ contents }}}
                </div>
            </section>
        </grid>
    `,

    components: {
        Grid,
    },

    mixins: [Pusher, SaveState],

    props: ['storeName', 'grid'],

    data() {
        return {
            contents: '',
	    priority: 0
        };
    },

    methods: {
        getEventHandlers() {
            return {
                'BatchingList': response => {
                    this.contents = response[this.storeName]['data'];
		//  this.contents = 'testing';
		    this.priority = response[this.storeName]['priority'];
                    console.log(response);
                    console.log(response[this.storeName]['data']);
		   console.log(this.contents);
                },
            };
        },

        getSavedStateId() {
            return `pos-data-${this.storeName}`;
        },
    },
};
