import lazysizes from 'lazysizes';

const initializeLazyLoading = (): void => {
  const images: HTMLImageElement[] = [].slice.call(
    document.querySelectorAll('img.lazy')
  );

  if ('IntersectionObserver' in window) {
    const imgObserver: IntersectionObserver = new IntersectionObserver(
      (entries: IntersectionObserverEntry[]) => {
        entries.forEach((entry: IntersectionObserverEntry) => {
          if (entry.isIntersecting) {
            const img = entry.target as HTMLImageElement;
            if (img.dataset.src && img.dataset.srcset) {
              img.src = img.dataset.src;
              img.srcset = img.dataset.srcset;
            }
            img.classList.remove('lazy');
            imgObserver.unobserve(img);
          }
        });
      }
    );
    images.map((img: HTMLImageElement) => imgObserver.observe(img));
  } else if ('loading' in HTMLImageElement.prototype) {
    const images: any = document.querySelectorAll('img[loading="lazy"]');
    images.map(
      (img: { src: any; dataset: { src: any } }) => (img.src = img.dataset.src)
    );
  } else {
    lazysizes.init();
  }
};

initializeLazyLoading();
