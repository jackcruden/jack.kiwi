<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, scale=1.0, user-scalable=no, viewport-fit=cover">

    <title>The Hunt</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
        }
        canvas {
            z-index: -1;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="m-6">
            <div class="mb-4">
                <h1>The Hunt</h1>
            </div>

            <div v-if="!success" class="mb-4">
                <strong>Clue #8</strong><br>
                You'll wish you paid attention<br>
                Every time I did mention<br>
                The R-F-I-D sticker<br>
                Where is it now?<br>
                That's the kicker!<br>
                It's the code that you need<br>
                Paste it here please.
            </div>

            <form v-if="!success" @submit.prevent="check()" class="flex">
                <div class="flex-1 pr-3">
                    <input v-model="codeInput" type="number" class="x-input" placeholder="Paste code&hellip;">
                </div>
                <div>
                    <button type="submit" class="x-button">Check</button>
                </div>
            </form>

            <div v-if="!success" class="mt-4">
                @{{ message }}
            </div>

            <div v-if="success" class="mt-4">
                <strong>Clue #9</strong><br>
                If you decoded this on your own<br>
                Congrats, you now sit<br>
                On the tech throne.<br>
                If you required a hand<br>
                I was of course your man.<br>
                <br>
                Treat number one<br>
                You know what it is<br>
                With the empty bottles<br>
                That no longer fizz.
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',

            data: {
                success: false,
                code: '12345678901234565',
                codeInput: '',
                message: 'Paste code above, it should fit like a glove.',
            },

            methods: {
                check() {
                    if (this.codeInput == this.code) {
                        this.success = true
                        this.message = ''
                        window.loop()
                    } else {
                        this.codeInput = ''
                        this.message = 'No such luck, try again pup.'
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/addons/p5.dom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.2/addons/p5.sound.min.js"></script>
    <script>
        let confettiColor = [], confetti = [];

        function setup() {
            noLoop();
          createCanvas(windowWidth,windowHeight);
            confettiColor = [color('#00aeef'), color('#ec008c'), color('#72c8b6')];
          for (let i = 0; i < 100; i++) {
            confetti[i] = new Confetti(random(0, width), random(-height, 0), random(-1, 1));
          }
        }

        function draw() {
          clear();

            for (let i = 0; i < confetti.length / 2; i++) {
            confetti[i].confettiDisplay();

            if (confetti[i].y > height) {
              confetti[i] = new Confetti(random(0, width), random(-height, 0), random(-1, 1));
            }
          }

          for (let i = int(confetti.length / 2); i < confetti.length; i++) {
            confetti[i].confettiDisplay();

            if (confetti[i].y > height) {
              confetti[i] = new Confetti(random(0, width), random(-height, 0), random(-1, 1));
            }
          }
        }

        class Confetti {
          constructor(_x, _y, _s) {
            this.x = _x;
            this.y = _y;
            this.speed = _s;
            this.time = random(0, 100);
            this.color = random(confettiColor);
            this.amp = random(2, 30);
            this.phase = random(0.5, 2);
            this.size = random(width / 25, height / 50);
          }

          confettiDisplay() {
            fill(this.color);
            // blendMode(SCREEN);
            noStroke();
            push();
            translate(this.x, this.y);
            translate(this.amp * sin(this.time * this.phase), this.speed * cos(2 * this.time * this.phase));
            rotate(this.time);
            rectMode(CENTER);
            scale(cos(this.time / 4), sin(this.time / 4));
            rect(0, 0, this.size, this.size / 2);
            pop();

            this.time = this.time + 0.1;

            this.speed += 1 / 200;

            this.y += this.speed;
          }
        }
    </script>
</body>
</html>

