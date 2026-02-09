// Scroll Animation Observer
export function initScrollAnimations() {
    // Alpine.js is already available via Filament, use x-intersect directive

    // Register custom Alpine data for scroll animations
    document.addEventListener('alpine:init', () => {
        Alpine.data('scrollReveal', () => ({
            visible: false,
            init() {
                this.$el.classList.add('opacity-0', 'translate-y-4');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.visible = true;
                            this.$el.classList.remove('opacity-0', 'translate-y-4');
                            this.$el.classList.add('animate-fade-in-up');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -100px 0px'
                });

                observer.observe(this.$el);
            }
        }));

        // Staggered animations for lists
        Alpine.data('staggeredReveal', (delay = 100) => ({
            visible: false,
            init() {
                const children = this.$el.children;
                Array.from(children).forEach((child, index) => {
                    child.classList.add('opacity-0', 'translate-y-4');
                    child.style.transitionDelay = `${index * delay}ms`;
                });

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.visible = true;
                            Array.from(children).forEach(child => {
                                child.classList.remove('opacity-0', 'translate-y-4');
                                child.classList.add('transition-all', 'duration-600');
                            });
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1
                });

                observer.observe(this.$el);
            }
        }));
    });
}
