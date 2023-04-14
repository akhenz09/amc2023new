<template>
    <section id="about" class="section bg-light-secondary dark:bg-dark-secondary">
      <div
        class="container mx-auto" v-motion :initial="{ opacity: 0, y: 100,}" :visible="{ opacity: 1, y: 0,}">
        <div class="flex flex-col xl:flex-row gap-10">
          <img class="object-cover h-full w-[830px] md:mx-auto lg:mx-0 rounded-2xl " src="http://127.0.0.1:8000/img/hero.jpg" alt="about" />
          <div
            class=" flex flex-col items-center text-center lg:items-start lg:text-left">
            <div class="flex flex-col ">
              <h2 class="text-4xl lg:text-4xl font-bold lg:font-extrabold mb-3 ">
                About the program
              </h2>
              <P class="mb-4 text-accent">AMC PODCLASS</P>
              <hr class="mb-8 opacity-10 dark:opacity-5" />
              <p class="mb-8 dark:text-white">
                PLE REAP AMC PodClass is the company's bridging program for the Australian <br />Medical Council CAT MCQ (Step 1). It is designed to be the most:<br />
                <br />
                <ul>
                    <li>innovative,</li>
                    <li>flexible,</li>
                    <li>high-yielding, and</li>
                    <li>affordable.</li>
                </ul>
                <br />

It optimizes the use of evidence-based study techniques instead of long, dragging lectures, which is a thing of the past. Ergo, it is ideal for the working clinician who prefers to balance study, work, family, and leisure.
              </p>
            </div>
            <a href="#contact" class="btn btn-md bg-accent text-light-tail-100">
              Contact me
            </a>
          </div>
        </div>
      </div>
    </section>
  </template>
