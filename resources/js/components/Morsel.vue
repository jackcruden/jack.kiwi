<template>
    <div class="mx-4 md:w-2/3 md:mx-auto my-4">
        <div class="flex mb-4">
            <div class="flex-1 self-end">
                <h1>Morsel</h1>
            </div>

            <div class="flex">
                <div class="mr-3">
                    <input v-model="speed" type="number" step="0.1" min="0.1" max="0.9" class="x-input">
                </div>

                <button @click="play(morse, false, true)" class="x-button">
                    Listen
                </button>
            </div>
        </div>

        <div class="mb-3">
            <div class="mb-3">
                <textarea v-model="english" @input="morse = englishToMorse(english)" class="x-input" placeholder="Enter English..."></textarea>
            </div>

            <div>
                <textarea v-model="morse" @input="english = morseToEnglish(morse)" class="x-input font-mono tracking-wide" placeholder="Enter morse..."></textarea>
            </div>
        </div>

        <div class="flex mb-4">
            <div class="flex-1 self-end">
                <h1>Learn</h1>
            </div>

            <div class="flex">
                <button class="x-button mr-3">
                    Start Game
                </button>
                <button class="x-button">
                    Continue
                </button>
            </div>
        </div>

        <div>

        </div>
    </div>
</template>

<script>
    import webAudioTouchUnlock from 'web-audio-touch-unlock'

    export default {
        props: [''],

        data() {
            return {
                sound: null,
                soundContext: null,
                speed: 0.9,
                morse: '',
                english: '',
                messages: [],
            }
        },

        computed: {

        },

        methods: {
            morseToEnglish(morse) {
                return morse.split('   ').map(word => {
                    return word.split(' ').map((letter) => {
                        return this.m2e(letter)
                    }).join('')
                }).join(' ')
            },
            englishToMorse(english) {
                return Array.from(english.toLowerCase()).map((letter) => {
                    return this.e2m(letter) + ' '
                }).join('')
            },
            e2m(letter) {
                return _.invert(alphabet)[letter]
            },
            m2e(letter) {
                return alphabet[letter]
            },
            play(morse, pause = false, first = true) {
                let count = 1 - this.speed

                if (first) {
                    this.soundContext = new (window.AudioContext || window.webkitAudioContext)()

                    // Fix iOS audio
                    webAudioTouchUnlock(this.soundContext)
                    .then(function (unlocked) {
                        if (unlocked) {

                        } else {

                        }
                    }, function (reason) {
                        console.log(reason)
                    })

                    this.sound = this.soundContext.createOscillator()
                    this.sound.connect(this.soundContext.destination)

                    // Wait for sound to get ready
                    setTimeout(() => {
                        this.play(morse, false, false)
                    }, 100)
                    return
                } else {
                    this.sound = this.soundContext.createOscillator()
                    this.sound.connect(this.soundContext.destination)
                }

                if (pause) {
                    setTimeout(() => {
                        this.play(morse, false, false)
                    }, 1000 * count)
                    return
                }

                let duration = 0
                if (morse.charAt(0) == '.') {
                    duration = 1
                    this.sound.start()
                    this.sound.stop(this.soundContext.currentTime + duration * count)
                } else if (morse.charAt(0) == '-') {
                    duration = 3
                    this.sound.start()
                    this.sound.stop(this.soundContext.currentTime + duration * count)
                } else if (morse.charAt(0) == ' ' || morse.charAt(0) == '/') {
                    duration = 1
                }

                if (morse.length > 1) {
                    setTimeout(() => {
                        this.play(morse.substring(1), true, false)
                    }, duration * 1000 * count)
                    return
                } else {
                    this.soundContext.close()
                    this.soundContext = null
                    this.sound = null
                    this.playing = false
                }
            },
        },

        created() {
            if (!!localStorage['messages']) {
                this.messages = JSON.parse(localStorage.getItem('messages'))
            }
        }
    }

    let alphabet = {
        "-----":"0",
        ".----":"1",
        "..---":"2",
        "...--":"3",
        "....-":"4",
        ".....":"5",
        "-....":"6",
        "--...":"7",
        "---..":"8",
        "----.":"9",
        ".-":"a",
        "-...":"b",
        "-.-.":"c",
        "-..":"d",
        ".":"e",
        "..-.":"f",
        "--.":"g",
        "....":"h",
        "..":"i",
        ".---":"j",
        "-.-":"k",
        ".-..":"l",
        "--":"m",
        "-.":"n",
        "---":"o",
        ".--.":"p",
        "--.-":"q",
        ".-.":"r",
        "...":"s",
        "-":"t",
        "..-":"u",
        "...-":"v",
        ".--":"w",
        "-..-":"x",
        "-.--":"y",
        "--..":"z",
        "/":" ",
        "-·-·--":"!",
        "·-·-·-":".",
        "--··--":","
    }
</script>
