<template>
    <section>
        <div class="top-nemovitosti">
            <div class="wrapper">
                <div class="row">
                    <div class="col-sm filtr-blok">
                        <div class="bg-filtr one"></div>

                        <div class="filtr-single">
                            <label>Typ inzerátu
                                <select name="">
                                    <option value="">Pronájem</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtr-single">
                            <label>Typ nemovitosti
                                <select name="">
                                    <option value="">Pronájem</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtr-single">
                            <label>Typ stavby
                                <select name="">
                                    <option value="">Pronájem</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtr-single">
                            <label>Cena od
                                <input type="text">
                            </label>
                        </div>

                        <div class="filtr-single">
                            <label>Cena do
                                <input type="text">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm filtr-blok">
                        <div class="bg-filtr two"></div>

                        <div class="filtr-single">
                            <label>Typ inzerátu
                                <select name="">
                                    <option value="">Pronájem</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtr-single">
                            <label>Typ inzerátu
                                <select name="">
                                    <option value="">Pronájem</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtr-single">
                            <label>Typ inzerátu
                                <select name="">
                                    <option value="">Pronájem</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtr-single">
                            <label>Cena od
                                <div class="slidecontainer">
                                    <input type="range" min="1" max="100" value="50" class="ranger" id="myRange">
                                </div>
                            </label>
                        </div>

                        <div class="filtr-single">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Vyhledavani"
    }
</script>

<style scoped>

</style>