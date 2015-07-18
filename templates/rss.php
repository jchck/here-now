<?
/** 
* Template Name: Podcast RSS
**/

// Query the Podcast Custom Post Type and fetch the latest 100 posts
$args = array( 'post_type' => 'podcast', 'posts_per_page' => 100 );
$loop = new WP_Query( $args );

// Output the XML header
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>

<?php // Start the iTunes RSS Feed: https://www.apple.com/itunes/podcasts/specs.html ?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
  
  <?php 
    // The information for the podcast channel 
    // Mostly using get_bloginfo() here, but these can be custom tailored, as needed
  ?>
  <channel>
    <title>Here and Now Podcast</title>
    <link><?php echo get_bloginfo('url'); ?></link>
    <language><?php echo get_bloginfo ( 'language' ); ?></language>
    <copyright><?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?></copyright>
    
    <itunes:author><?php echo get_bloginfo('name'); ?></itunes:author>
    <description>Here and Now is a weekly podcast hosted by Justin Chick and Charles Purnell. Conversations begin with and generally revolve around a verb, what it means to us, and how we relate to it.</description>
    <itunes:subtitle>Here and Now is a weekly podcast hosted by Justin…</itunes:subtitle>
    
    <itunes:owner>
      <itunes:name><?php echo get_bloginfo('name'); ?></itunes:name>
      <itunes:email>hereandnow.pod@gmail.com</itunes:email>
    </itunes:owner>

    <itunes:explicit>yes</itunes:explicit>
    
    <?php // Change to your own image. Must be at least 1400 x 1400: https://www.apple.com/itunes/podcasts/creatorfaq.html ?> 
    <itunes:image href="<?php echo plugins_url( 'assets/img/logo.jpg', dirname(__FILE__) ); ?>"/>
    <image>
      <url><?php echo plugins_url( 'assets/img/logo.jpg', dirname(__FILE__) ); ?></url>
      <title>Here and Now</title>
      <link>http://hereandnow.io</link>
    </image>
    <itunes:category text="Society &amp; Culture"/>
    
    <?php // Start the loop for Podcast posts
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <item>
      <title><?php the_title_rss(); ?></title>
      <itunes:author><?php echo get_bloginfo('name'); ?></itunes:author>
      <itunes:summary><?php the_excerpt_rss(50, 0); ?></itunes:summary>
      <itunes:image href="<?php echo plugins_url( 'assets/img/logo.jpg', dirname(__FILE__) ); ?>" />
      
      <?php // Get the file field URL and filesize
        $attachment_id = get_field('audio_file');
        $fileurl = wp_get_attachment_url( $attachment_id );
        $filesize = filesize( get_attached_file( $attachment_id ) );
      ?>
      
      <enclosure url="<?php echo $fileurl; ?>" length="<?php echo $filesize; ?>" type="audio/mpeg" />
      <guid><?php echo $fileurl; ?></guid>
      <guid><?php the_field('audio_file'); ?></guid>
      <pubDate><?php the_time( 'D, d M Y G:i:s T') ?></pubDate>
      <itunes:duration><?php the_field('podcast_duration'); ?></itunes:duration>
    </item>
    <?php endwhile; ?>
  
  </channel>

</rss>