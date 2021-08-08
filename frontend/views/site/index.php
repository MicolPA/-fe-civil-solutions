<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- <section class="slice py-7"> -->
    <section class="">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2 text-center">
                    <!-- Image -->
                    <figure class="w-100">
                        <img alt="Image placeholder" src="/frontend/web/images/illustration-3.svg" class="img-fluid mw-md-120">
                    </figure>
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1 pr-md-5">
                    <!-- Heading -->
                    <h1 class="display-4 text-center text-md-left mb-3">
                        It's time to amplify your <strong class="text-primary">knowlegde</strong>
                    </h1>
                    <!-- Text -->
                    <p class="lead text-center text-md-left text-muted">
                        Get started practicing for your exams.
                    </p>
                    <!-- Buttons -->
                    <div class="text-center text-md-left mt-5">
                        <a href="/frontend/web/site/login" class="btn btn-primary btn-icon">
                            <i class="fas fa-sign-in-alt"></i>
                            <span class="btn-inner--text">Sign in</span>
                            <span class="btn-inner--icon"><i data-feather="chevron-right"></i></span>
                        </a>
                        <a href="/frontend/web/site/signup" class="btn btn-neutral btn-icon d-none d-lg-inline-block">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
