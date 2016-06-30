import Grid from './grid';
import Pusher from '../mixins/pusher';
import SaveState from '../mixins/save-state';

export default {

    template: `
        <grid :position="grid" modifiers="overflow padded blue">
            <section class="store-data">
                <h1 class="store-data__title">{{ storeName | capitalize }}</h1>
                <div  class="store-data__content">
                    {{{ contents }}}{{ message }}
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
	    message: 'testing',
        };
    },

    methods: {
        getEventHandlers() {
            return {
                'App\\Components\\ATG\\Events\\StoreContentFetched': response => {
                    this.storedatacontents = response.storeContent[this.storeName];
                    console.log(this.storedatacontents);
                },
            };
        },

        getSavedStateId() {
            return `store-data-${this.storeName}`;
        },
    },
};
