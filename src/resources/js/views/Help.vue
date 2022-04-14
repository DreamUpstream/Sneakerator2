<script setup>
import { onMounted } from "vue";
import feather from "feather-icons";
onMounted(() => {
    feather.replace();
});
</script>

<template>
    <section>
        <h3 class="text-center mb-4 pb-2 text-success fw-bold mt-5">FAQ</h3>
        <p class="text-center mb-5">
            Find the answers for the most frequently asked questions below
        </p>

        <div class="row p-5">
            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-success">
                    <i class="far fa-paper-plane text-success pe-2"></i> Can I
                    get some tokens?
                </h6>
                <p>
                    <strong><u>Absolutely!</u></strong> You just need to pay! We
                    work with top payment companies which guarantees your safety
                    and security. All billing information is stored on our
                    payment processing partner. Just kidding, tokens are free.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-success">
                    <i class="fas fa-pen-alt text-success pe-2"></i> Can I
                    change my password?
                </h6>
                <p>
                    <strong><u>Yes, it is possible!</u></strong> You can change
                    your password anytime in your /login route by clicking on
                    forgot password button. Once the Once you enter your email,
                    a notification will be sent with the password change link.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-success">
                    <i class="fas fa-user text-success pe-2"></i> How to use the
                    selling dashboard?
                </h6>
                <p>
                    You can go try out by clicking bunch of stuff and maybe you
                    will figure it out.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-success">
                    <i class="fas fa-rocket text-success pe-2"></i> How to use
                    the analyse section?
                </h6>
                <p>
                    Go to the analyse section of your dashboard, search and
                    click analyse, obviously.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-success">
                    <i class="fas fa-home text-success pe-2"></i> I don't have
                    enough tokens..?
                </h6>
                <p>
                    <strong><u>Unfortunately, it sucks for you.</u>.</strong> We
                    do not issue tokens for free, go earn some money and buy
                    more tokens.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <h6 class="mb-3 text-success">
                    <i class="fas fa-book-open text-success pe-2"></i>Another
                    question that is not mentioned here?
                </h6>
                <p>
                    Please write a poem with all of your questions and send it
                    by mail to us, we will happily use it in our fireplaces.
                </p>
            </div>
        </div>
    </section>
</template>
