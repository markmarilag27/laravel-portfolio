import './plugins/lazyload';
import { createApp } from 'vue';
import LogoSVG from '@/components/SVG/LogoSVG.vue';

const targetElement = document.getElementById('app');

if (targetElement) {
  const app = createApp({
    components: {
      'logo-svg': LogoSVG,
    },
  });
  app.mount(targetElement);
}
