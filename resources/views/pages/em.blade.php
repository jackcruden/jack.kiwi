<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, scale=1.0, user-scalable=no, viewport-fit=cover">

    <title>The Hunt</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="m-6">
            <div class="mb-4">
                <h1>The Hunt</h1>
                <p>Clue #8</p>
            </div>

            <div class="mb-4">
                You'll wish you paid attention,<br>
                every time I did mention,<br>
                the R-F-I-D sticker,<br>
                where is it now,<br>
                that's the kicker.<br>
                It's the code that you need,<br>
                paste it here please.
            </div>

            <form @submit.prevent="check()" class="flex">
                <div class="flex-1 pr-3">
                    <input v-model="codeInput" type="number" class="x-input" placeholder="Paste code&hellip;">
                </div>
                <div>
                    <button type="submit" class="x-button">Check</button>
                </div>
            </form>

            <div class="mt-4 text-lg">
                @{{ message }}
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',

            data: {
                code: '12345678901234565',
                codeInput: '',
                message: '',
            },

            methods: {
                check() {
                    if (this.codeInput == this.code) {
                        this.message = 'yep'
                    } else {
                        this.codeInput = ''
                        this.message = 'No such luck.'
                        setTimeout(() => {
                            this.message = ''
                        }, 1000)
                    }
                }
            },

            created() {
                console.log('working');
            }
        })
    </script>
</body>
</html>

