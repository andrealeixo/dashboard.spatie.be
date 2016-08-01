import Grid from './grid';
import Pusher from '../mixins/pusher';
import SaveState from '../mixins/save-state';

export default {

    template: `
        <grid :position="grid" modifiers="overflow padded blue">
            <section class="trello-data">
                <h1 class="trello-data__title">{{ storeName | capitalize }}</h1>
                <div  class="trello-data__content">
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
                'App\\Components\\Trello\\Events\\TrelloContentFetched': response => {
                    this.contents = response.storeContent[this.storeName];
                    console.log(response);
                },
            };
        },

        getSavedStateId() {
            return `trello-data-${this.storeName}`;
        },
    },
};
