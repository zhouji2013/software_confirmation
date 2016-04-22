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
if($swname == 'ARACNE_SOURCE') {
  $swname = 'ARACNE';
  $platform = 'Source';
}
if($swname == 'TEISER' || $swname == 'FIRE' || $swname == 'iPAGE' || $swname == 'FIRE-pro' || $swname == 'EVE') {
  $uni = 'st2744';
} else if($swname == 'ARACNE' || $swname =='BCI' || $swname =='Biastools' || $swname == 'Cleaner' || $swname == 'DEMAND'
    || $swname == 'HERMES' || $swname == 'MARINA' || $swname == 'MINDY' || $swname == 'SPLASH' || $swname == 'VIPER') {
  $uni = 'ac2248';
} else if($swname == 'geWorkbench') {
  $uni = 'af2202';
} else {
  $uni = 'ac2248';
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
    header( 'Location: https://califano.squarespace.com/s/BCI.txt' );
} else if($swname == 'Biastools') {
    header( 'Location: https://califano.squarespace.com/s/Biastools.txt' );
} else if($swname == 'VIPER') {
header( 'Location: https://califano.squarespace.com/s/Viper_0990tar.gz' ); 
} else if($swname == 'MINDY') {
    if($platform == 'Linux') {
        header( 'Location: https://califano.squarespace.com/s/MINDY2_Ctar.gz' ); 
    } else {
        header( 'Location: https://califano.squarespace.com/s/MINDY2_MATLABtar.gz' ); 
    }
} else if($swname == 'SPLASH') {
    if($platform == 'Windows') {
        header( 'Location: https://califano.squarespace.com/s/splash.exe' ); 
    } else if($platform == 'Linux') {
        header( 'Location: https://califano.squarespace.com/s/splash' );
    }
} else if($swname == 'Cleaner') {
    if($platform == 'Windows') {
		if($version == '1.03') {
			header( 'Location: https://califano.squarespace.com/s/Cleaner103.zip' );
		} else if($version == '1.02') {
			header( 'Location: https://califano.squarespace.com/s/Cleaner102.zip' );
		} else if($version == '1.01') {
			header( 'Location: https://califano.squarespace.com/s/Cleaner101.zip' );
		} else {
			header( 'Location: https://califano.squarespace.com/s/Cleaner.zip' );
		}
    } else if($platform == 'Linux') {
		if($version == '1.03') {
			header( 'Location: https://califano.squarespace.com/s/Cleaner103tar.gz' );
		} else if($version == '1.02') {
			header( 'Location: https://califano.squarespace.com/s/Cleaner102tar.gz' );
		} else if($version == '1.01') {
			header( 'Location: https://califano.squarespace.com/s/Cleaner101tar.gz' );
		} else {
			header( 'Location:  https://califano.squarespace.com/s/Cleanertar.gz' );
		}
    }
} else if($swname == 'ARACNE') {
    if($platform == 'Windows') {
        header( 'Location: https://califano.squarespace.com/s/aracne2.exe' );
    } else if($platform == 'GNU-Linux') {
        header( 'Location: https://califano.squarespace.com/s/aracne2' );
    } else if($platform == 'Mac-OSX') {
        header( 'Location: https://califano.squarespace.com/s/aracne2.macosx' );
    } else if($platform == 'Source') {
        if($language == 'Java') {
            header( 'Location: https://califano.squarespace.com/s/ARACNE-javasrctar.gz' );
        } else if($language == 'C++') {
            header( 'Location: https://califano.squarespace.com/s/ARACNEsrctar.gz' );
        }
    } else if ($platform == 'all_GUI') {
        header( 'Location: http://wiki.c2b2.columbia.edu/informatics/data/aracne.zip' );
    } else {
        header( 'Location: https://califano.squarespace.com/s/aracne2.jar' );
    }
} else if($swname == 'DEMAND') {
     	header( 'Location: https://califano.squarespace.com/s/DeMAND_0990tar.gz' );
} else if($swname == 'HERMES') {
    if($version == '1'){
	header( 'Location: https://califano.squarespace.com/s/Hermes.zip' ); 
    } else if ($version == '2'){
    	header( 'Location: https://califano.squarespace.com/s/Hermes-v20tar.gz' ); 
    }
} else if($swname == 'MARINA') {
    header( 'Location: https://califano.squarespace.com/s/Marina_matlab-4.tar' );
} else if($swname == 'TCGA-AML-TF') {
    header( 'Location: http://wiki.c2b2.columbia.edu/informatics/data/laml_tcga_rnaseq_tf-regulon.txt' );
} else if($swname == 'TCGA-AML-SIG') {
    header( 'Location: http://wiki.c2b2.columbia.edu/informatics/data/laml_tcga_rnaseq_sig-regulon.txt' );
} else if($swname == 'Bcell-U95av2-Interactome') {
    header( 'Location: https://califano.squarespace.com/s/BcellNetwork-U95Av2.rtf' );
} else if($swname == 'Bcell-U133p2-Interactome') {
    header( 'Location: https://califano.squarespace.com/s/BCellNetwork-U133P2.rtf' );
} else if($swname == 'BRCA-MCF7-Interactome') {
    header( 'Location: https://califano.squarespace.com/s/BreastCancerMCF7-CMAP.rtf' );
} else if($swname == 'geWorkbench') {
    if($platform == 'Windows_x64') {
        header( 'Location: https://cbiit-download.nci.nih.gov/geworkbench/releases/2.6.0/geWorkbench_v2.6.0_Windows_JRE7_x64.exe' );
    } else if ($platform == 'Windows_x86') {
        header( 'Location: https://cbiit-download.nci.nih.gov/geworkbench/releases/2.6.0/geWorkbench_v2.6.0_Windows_JRE7_x86.exe' );
    } else if ($platform == 'Windows_noJRE') {
        header( 'Location: https://cbiit-download.nci.nih.gov/geworkbench/releases/2.6.0/geWorkbench_v2.6.0_Windows_noJRE.exe' );
    } else if($platform == 'Linux_noJRE') {
        header( 'Location: https://cbiit-download.nci.nih.gov/geworkbench/releases/2.6.0/geWorkbench_v2.6.0_Linux_noJRE.bin' );
    } else if ($platform == 'Linux_x64') {
        header( 'Location: https://cbiit-download.nci.nih.gov/geworkbench/releases/2.6.0/geWorkbench_v2.6.0_Linux_JRE7_x64.bin' );
    } else if($platform == 'MacOSX_x64') {
        header( 'Location: https://cbiit-download.nci.nih.gov/geworkbench/releases/2.6.0/geWorkbench_v2.6.0_MacOSX_JRE7_x64.zip' ); 
    } else if($platform == 'Generic') {
        header( 'Location: https://cbiit-download.nci.nih.gov/geworkbench/releases/2.6.0/geWorkbench_v2.6.0_Generic.zip' ); 
    } 
} else {
header( 'Location: http://magnet.c2b2.columbia.edu/'); 
}
?>