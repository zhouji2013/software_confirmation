<?php

include_once(drupal_get_path('module', 'webform') .'/includes/webform.submissions.inc');
$nid = arg(1); 
$sid = $_GET['sid'];

$submission = webform_get_submission($nid, $sid);
$swname = $submission->data[7]['value'][0];
$version = $submission->data[8]['value'][0];
$language = $submission->data[9]['value'][0];
$platform = $submission->data[10]['value'][0];
$uni = '';

if($swname == 'TEISER') {
  $uni = 'st2744';
} else if($swname == 'FIRE') {
  $uni = 'st2744';
} else if($swname == 'iPAGE') {
  $uni = 'st2744';
} else if($swname == 'FIRE-pro') {
  $uni = 'st2744';
} else if($swname == 'EVE') {
  $uni = 'st2744';
} else if($swname == 'ARACNE' || $swname == 'SPLASH' || $swname == 'MINDY' || $swname == 'BCI' || $swname == 'CLEANER'
 || $swname == 'VIPER') {
  $uni = 'ac2248';
} else if($swname == 'ARACNE SOURCE') {
  $uni = 'ac2248';
} else if($swname == 'ARACNE GUI') {
  $uni = 'ac2248';
} else if($swname == 'HERMES') {
  $uni = 'ac2248';
} else if($swname == 'geWorkbench') {
  $uni = 'af2202';
}

// the returned value should be one
$num_updated = db_query('update webform_submitted_data set data="'.$uni.'" where nid='.$nid.' and sid='.$sid.' and cid=6');

if($swname == 'TEISER') {
header( 'Location: https://tavazoielab.c2b2.columbia.edu/TEISER/TEISERv1.0.tar.gz' );
} else if($swname == 'FIRE') {
header( 'Location: https://tavazoielab.c2b2.columbia.edu/FIRE/download/FIRE-1.1a.zip' ); 
} else if($swname == 'iPAGE') {
header( 'Location: https://tavazoielab.c2b2.columbia.edu/iPAGE/iPAGEv1.2a.zip' ); 
} else if($swname == 'FIRE-pro') {
header( 'Location: https://tavazoielab.c2b2.columbia.edu/FIRE-pro/download/FIREpro-1.1.zip' ); 
} else if($swname == 'EVE') {
header( 'Location: https://tavazoielab.c2b2.columbia.edu/EVE/EVE.zip' ); 
} else if($swname == 'BCI') {
header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/BCI.txt' ); 
} else if($swname == 'VIPER') {
header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/5/5c/Viper_0.99.0.tar.gz' ); 
} else if($swname == 'MINDY') {
    if($platform == 'Linux') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/MINDY2/MINDY2_C++.tar.gz' ); 
    } else {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/MINDY2/MINDY2_MATLAB.tar.gz' ); 
    }
} else if($swname == 'SPLASH') {
    if($platform == 'Windows') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/splash/splash.exe' ); 
    } else if($platform == 'Linux') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/splash/splash' ); 
    }
} else if($swname == 'CLEANER') {
    if($platform == 'Windows') {
		if($version == '1.03') {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/e/ed/Cleaner103.zip' ); 
		} else if($version == '1.02') {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/c/ca/Cleaner102.zip' ); 
		} else if($version == '1.01') {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/d/d3/Cleaner101.zip' ); 
		} else {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/1/18/Cleaner.zip' ); 
		}
    } else if($platform == 'Linux') {
		if($version == '1.03') {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/8/81/Cleaner103.tar.gz' ); 
		} else if($version == '1.02') {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/c/c6/Cleaner102.tar.gz' ); 
		} else if($version == '1.01') {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/5/5f/Cleaner101.tar.gz' ); 
		} else {
			header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/c/c0/Cleaner.tar.gz' ); 
		}
    }
} else if($swname == 'ARACNE') {
    if($platform == 'Windows') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/ARACNE2/aracne2.exe' ); 
    } else if($platform == 'Linux') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/ARACNE2/aracne2' ); 
    } else if($platform == 'MacOSX') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/ARACNE2/aracne2.macosx' ); 
    } else {
      header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/ARACNE2/aracne2.jar' ); 
    }
} else if($swname == 'ARACNE SOURCE') {
    if($language == 'Java') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/ARACNE2/ARACNE-java.src.tar.gz' ); 
    } else if($language == 'C++') {
        header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/ARACNE2/ARACNE.src.tar.gz' ); 
    }
} else if($swname == 'ARACNE GUI') {
header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/download/ARACNE/aracne.zip' ); 
} else if($swname == 'HERMES') {
header( 'Location: http://wiki.c2b2.columbia.edu/califanolab/images/c/c0/Hermes.zip' ); 
} else if($swname == 'geWorkbench') {
    if($platform == 'Windows') {
        header( 'Location: http://wiki.c2b2.columbia.edu/workbench/data/geWorkbench_v2.4.1_Windows_installer_noJRE.exe' );
    } else if ($platform == 'Windows_with_JRE') {
        header( 'Location: http://wiki.c2b2.columbia.edu/workbench/data/geWorkbench_v2.4.1_Windows_installer_with_JRE6.exe' );
    } else if($platform == 'Linux') {
        header( 'Location: http://wiki.c2b2.columbia.edu/workbench/data/geWorkbench_v2.4.1_Linux_installer_noJRE.bin' );
    } else if ($platform == 'Linux_with_JRE') {
        header( 'Location: http://wiki.c2b2.columbia.edu/workbench/data/geWorkbench_v2.4.1_Linux_installer_with_JRE6.bin' );
    } else if($platform == 'MacOSX') {
        header( 'Location: http://wiki.c2b2.columbia.edu/workbench/data/geWorkbench_v2.4.1_MacOSX_installer.zip' ); 
    } else {
        header( 'Location: http://wiki.c2b2.columbia.edu/workbench/data/geWorkbench_v2.4.1_Generic.zip' ); 
    }
} else {
header( 'Location: http://magnet.c2b2.columbia.edu/'); 
}
?>