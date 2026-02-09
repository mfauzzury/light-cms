import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // Brand Color System - Dark Blue
            colors: {
                primary: {
                    50: '#eff6ff',   // Lightest blue
                    100: '#dbeafe',  // Very light blue
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#1e40af',  // Main dark blue
                    600: '#1e3a8a',
                    700: '#1d4ed8',
                    800: '#1e3a8a',
                    900: '#172554',
                },
                secondary: {
                    50: '#f0f9ff',
                    100: '#e0f2fe',
                    200: '#bae6fd',
                    300: '#7dd3fc',
                    400: '#38bdf8',
                    500: '#0ea5e9',
                    600: '#0284c7',
                    700: '#0369a1',
                    800: '#075985',
                    900: '#0c4a6e',
                },
                accent: {
                    50: '#fef2f2',
                    100: '#fee2e2',
                    200: '#fecaca',
                    300: '#fca5a5',
                    400: '#f87171',
                    500: '#ef4444',
                    600: '#dc2626',
                    700: '#b91c1c',
                    800: '#991b1b',
                    900: '#7f1d1d',
                },
            },
            // Modern Shadow System
            boxShadow: {
                'soft': '0 2px 15px rgba(0, 0, 0, 0.05)',
                'soft-lg': '0 10px 40px rgba(0, 0, 0, 0.08)',
                'soft-xl': '0 20px 60px rgba(0, 0, 0, 0.12)',
                'glow': '0 0 20px rgba(30, 64, 175, 0.3)',
                'glow-lg': '0 0 40px rgba(30, 64, 175, 0.4)',
            },
            // Animation Keyframes
            keyframes: {
                'fade-in-up': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(20px)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)',
                    },
                },
                'fade-in-down': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-20px)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)',
                    },
                },
                'scale-in': {
                    '0%': {
                        opacity: '0',
                        transform: 'scale(0.95)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'scale(1)',
                    },
                },
                'slide-in-left': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(-20px)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)',
                    },
                },
                'slide-in-right': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateX(20px)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateX(0)',
                    },
                },
                'pulse-soft': {
                    '0%, 100%': {
                        opacity: '1',
                    },
                    '50%': {
                        opacity: '0.8',
                    },
                },
            },
            animation: {
                'fade-in-up': 'fade-in-up 0.6s ease-out',
                'fade-in-down': 'fade-in-down 0.6s ease-out',
                'scale-in': 'scale-in 0.5s ease-out',
                'slide-in-left': 'slide-in-left 0.6s ease-out',
                'slide-in-right': 'slide-in-right 0.6s ease-out',
                'pulse-soft': 'pulse-soft 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            },
            // Modern Border Radius
            borderRadius: {
                '4xl': '2rem',
                '5xl': '3rem',
            },
            // Extended Spacing for Modern Layouts
            spacing: {
                '18': '4.5rem',
                '88': '22rem',
                '128': '32rem',
            },
            // Typography Enhancements
            fontSize: {
                '2xs': ['0.625rem', { lineHeight: '0.75rem' }],
                '3xl': ['2rem', { lineHeight: '2.25rem' }],
                '4xl': ['2.5rem', { lineHeight: '2.75rem' }],
                '5xl': ['3rem', { lineHeight: '3.25rem' }],
            },
        },
    },
    plugins: [],
};
