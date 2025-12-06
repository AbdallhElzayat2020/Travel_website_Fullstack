/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./src/**/*.{php,html,js}",
        "./assets/**/*.{php,html,js}",
        "./*.{php,html,js}"
    ],
    theme: {
        extend: {
            fontFamily: {
                urbanist: ['Urbanist', 'sans-serif'],
            },
            colors: {
                'white': '#FFFFFF',
                'white-grey': '#F2F4F4',
                'light-grey': '#E8EDF1',
                'grey': '#AAAFB6',
                'dark-grey': '#4F5E71',
                'darker-grey': '#1E1E1E',
                'black': '#121212',
                'stroke': '#383D43',

                'green': {
                    'light': '#E6F7F4',
                    'light-hover': '#D9F2EE',
                    'light-active': '#B0E5DD',
                    'light-zomp': '#50D8C8',
                    'zomp': '#01AA90',
                    'zomp-hover': '#019982',
                    'zomp-active': '#018873',
                    'dark': '#01806C',
                    'dark-hover': '#016656',
                    'dark-active': '#004C41',
                    'darker': '#003B32'
                },

                'bg-pink': '#FFEBF5',
                'bg-orange': '#FFF0ED',

                'text-pink': '#CF3881',
                'text-orange': '#E9652E',

                'orange-yellow': '#FC961B',
                'red': '#AA0101',
                'disabled': '#CCD8D6'
            },
            container: {
                center: true,
                padding: {
                    DEFAULT: '16px',
                },
                screens: {
                    // sm: '639px',
                    // md: '767px',
                    // lg: '1023px',
                    xl: '1272px',
                    '2xl': '1304px',
                },
            },
            boxShadow: {
                'shadow-custom': '0px 1px 16px 0px rgba(0,0,0,0.12)',
            },
        },
    },
    plugins: [],
}