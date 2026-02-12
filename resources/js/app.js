import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";


createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("../views/web/pages/**/*.vue");

        return pages[`../views/web/pages/${name}.vue`]();
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
