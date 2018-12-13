<?php /* Template Name: Secretarias */ ?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Identidade_Digital_do_Governo_-_WordPress
 */

get_header();
?>

  <main id="main" class="site-main">
    <div class="container">
      <?php the_breadcrumb (); ?>

      <div class="row">
        <div class="col-12">
          <?php
          while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content-page', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;

          endwhile; // End of the loop.
          ?>
        </div>

        <div class="entry-content">
          <?php get_template_part('template-parts/copyright'); ?>
        </div>
      </div>

      <div id="conteudo-especifico">
        <h2>Conteúdo Específico
        <div class="row">
          <div class="col">
            <div class="feature-card text-center card-1">
              <a href="http://hmg.cultura.gov.br/acesso-a-informacao/acoes-e-programas/">
                <div class="align">
                  <div class="icon icon-acoes-programadas"></div>
                  <h3 class="card-title">Conteúdo #1</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col">
            <div class="feature-card text-center card-1">
              <a href="http://hmg.cultura.gov.br/acesso-a-informacao/acoes-e-programas/">
                <div class="align">
                  <div class="icon icon-acoes-programadas"></div>
                  <h3 class="card-title">Conteúdo #2</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col">
            <div class="feature-card text-center card-1">
              <a href="http://hmg.cultura.gov.br/acesso-a-informacao/acoes-e-programas/">
                <div class="align">
                  <div class="icon icon-acoes-programadas"></div>
                  <h3 class="card-title">Conteúdo #3</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="container mb-5">
      <div class="col-12 pt-4 pb-4">
          <div id="search-content-wrapper">
            <h2>O que você esta procurando?</h2>
            <form id="search-content">
              <div class="input-wrapper">
                <input type="text" name="search" placeholder="Buscar" />
                <button type="submit" class="search"><i class="icon-search"></i></button>
                <button type="button" class="filter">Filtrar</button>
              </div>

              <div class="filter-wrapper">

                <label><input type="checkbox" name="andamento" /> Artigos</label>
                <label><input type="checkbox" name="inscricoes" /> Publicações</label>

                <button type="button" class="apply">Aplicar</button>
              </div>
            </form>
          </div>

        <div class="row">

          <?php

          $news_query = array(
            'posts_per_page' => 3,
            'category_name'  => 'noticias'
          );

          $news_query = new WP_Query( $args ); ?>

          <?php if ( $news_query->have_posts() ) : ?>

            <?php
            while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                  <?php the_title( '<h2><a href="'. get_the_permalink() .'">', '</a></h2>' ); ?>
                </header>

                <div class="entry-content">
                  <?php the_excerpt(); ?>
                </div>

                <footer class="entry-footer">
                  <?php idg_wp_entry_footer(); ?>
                  <div class="date-box mb-4">
                    <span>publicado: <?php the_date('d/m/Y'); ?> <?php the_time('H'); ?>h<?php the_time('i'); ?>, última modificação: <?php the_modified_date('d/m/Y'); ?> <?php the_modified_time('H'); ?>h<?php the_modified_time('i'); ?></span>
                  </div>
                </footer>
              </article>

            <?php
            endwhile;

            the_posts_navigation();

          else :

            get_template_part( 'template-parts/content', 'none' );

          endif;
          ?>
        </div>
      </div>
    </div>
  </main>
<?php
get_footer();
