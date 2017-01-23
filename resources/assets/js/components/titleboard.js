import Grid from './grid';

export default {

    template: `
        <grid :position="grid" modifiers="overflow padded green">
            <section class="title-data">
                <div  class="title-data__content">
                    {{{ contents }}}
                </div>
            </section>
        </grid>
    `,

    components: {
        Grid,
    },

    props: ['grid'],

    data() {
        return {
            contents: 'Consumer PPN Sprint',
        };
    },

    methods: {
    },
};
