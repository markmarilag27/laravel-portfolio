import { createApp } from "vue";
import HelloWorld from "@/components/HelloWorld.vue";

const targetElement = document.getElementById("app");

if (targetElement) {
    const app = createApp({
        components: {
            HelloWorld,
        },
    });
    app.mount(targetElement);
}
