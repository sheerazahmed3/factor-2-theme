<?php
/**
 * Template Name: Testing / Style Guide
 *
 * @package Factor_2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<style>
    .factor-why-us {
        padding: 100px 0;
        background-color: #f7ffe8; /* Light green background from reference */
        font-family: 'Manrope', 'Inter', sans-serif;
    }

    .factor-why-us .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .factor-why-us__header {
        text-align: center;
        margin-bottom: 60px;
    }

    .factor-why-us__header h2 {
        font-size: 56px;
        font-weight: 800;
        color: #79b530; /* Darker green for title, similar to reference */
        margin: 0;
        letter-spacing: -0.03em;
    }

    .factor-why-us__grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .factor-why-us__card {
        background: #e8e8e8; /* Light gray card background from reference */
        padding: 35px 30px;
        border-radius: 2px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        min-height: 220px; /* Made it taller to match reference ratio */
    }

    .factor-why-us__card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .factor-why-us__card h3 {
        font-size: 22px; /* Significantly larger as per reference image */
        font-weight: 700;
        color: #000;
        margin-bottom: 20px;
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .factor-why-us__card p {
        font-size: 13px; /* Slightly larger description */
        color: #333;
        line-height: 1.5;
        margin: 0;
        font-weight: 400;
    }

    @media (max-width: 991px) {
        .factor-why-us__grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .factor-why-us__header h2 {
            font-size: 36px;
        }
    }

    @media (max-width: 767px) {
        .factor-why-us__grid {
            grid-template-columns: 1fr;
        }
        .factor-why-us {
            padding: 60px 0;
        }
        .factor-why-us__card {
            padding: 30px;
        }
    }
</style>

<main id="main" class="site-main">
    <section class="factor-why-us">
        <div class="container">
            <div class="factor-why-us__header">
                <h2>Why choose us</h2>
            </div>

            <div class="factor-why-us__grid">
                <div class="factor-why-us__card">
                    <h3>When you partner with us, we become 'YOU'</h3>
                    <p>Not a tall claim, our clients can vouch for that.</p>
                </div>
                <div class="factor-why-us__card">
                    <h3>We start with the 'why' not the 'what'</h3>
                    <p>Because having clarity on the why's makes it a lot simpler</p>
                </div>
                <div class="factor-why-us__card">
                    <h3>We bring simplicity to chaos</h3>
                    <p>When companies face growing complexities, they call us.</p>
                </div>
                <div class="factor-why-us__card">
                    <h3>We say what we do, and do what we say</h3>
                    <p>Complete transparency keeps everything simple for both of us.</p>
                </div>
                <div class="factor-why-us__card">
                    <h3>We're not just coders, we're problem solvers</h3>
                    <p>Being 'solution-oriented' is a mindset we've embraced.</p>
                </div>
                <div class="factor-why-us__card">
                    <h3>Good engineering with strict quality controls</h3>
                    <p>We know you're tired of fakes who claim to be what they are not.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
