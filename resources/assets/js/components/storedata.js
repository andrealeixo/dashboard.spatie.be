import Grid from './grid';
import Pusher from '../mixins/pusher';
import SaveState from '../mixins/save-state';

export default {

    template: `
        <grid :position="grid" modifiers="overflow padded blue">
            <section class="store-data">
                <h1 class="store-data__title">{{ storeName | capitalize }}</h1>
                <div  class="store-data__content">
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
                'App\\Components\\ATG\\Events\\StoreContentFetched': response => {
                    this.contents = response.storeContent[this.storeName];
                },
            };
        },

        getSavedStateId() {
            return `store-data-${this.storeName}`;
        },
    },
};
