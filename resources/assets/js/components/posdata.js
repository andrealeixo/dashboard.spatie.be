import Grid from './grid';
import Pusher from '../mixins/pusher';
import SaveState from '../mixins/save-state';

export default {

    template: `
        <grid :position="grid" modifiers="overflow padded blue">
            <section class="pos-data">
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
        };
    },

    methods: {
        getEventHandlers() {
            return {
                'BatchingList': response => {
                    this.contents = response[this.storeName];
                    console.log(response);
                },
            };
        },

        getSavedStateId() {
            return `pos-data-${this.storeName}`;
        },
    },
};
