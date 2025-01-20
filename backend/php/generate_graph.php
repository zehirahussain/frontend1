<?php
// Define the commands to run the Python scripts
$command1 = escapeshellcmd('python ..\\python\\segmentation.py');
$command2 = escapeshellcmd('python ..\\python\\productrevLC.py');
$command3 = escapeshellcmd('python ..\\python\\churnrate.py');
$command4 = escapeshellcmd('python ..\\python\\revproduct.py');
$command5 = escapeshellcmd('python ..\\python\\review_analysis.py');
$command6 = escapeshellcmd('python ..\\python\\review_analysis_comments.py');
$command7 = escapeshellcmd('python ..\\python\\review_analysis_semantic.py');
$command8 = escapeshellcmd('python ..\\python\\make_presentation.py');
$command9 = escapeshellcmd('python ..\\python\\analysis_to_images.py');
$command10 = escapeshellcmd('python ..\\python\\generate_report.py');

// Execute both commands
$output1 = shell_exec($command1);
$output2 = shell_exec($command2);
$output3 = shell_exec($command3);
$output4 = shell_exec($command4);
$output5 = shell_exec($command5);
$output6 = shell_exec($command6);
$output7 = shell_exec($command7);
$output8 = shell_exec($command8);
$output9 = shell_exec($command9);
$output10 = shell_exec($command10);

// Output the results (if needed)
echo $output1;
echo $output2;
echo $output3;
echo $output4;
echo $output5;
echo $output6;
echo $output7;
echo $output8;
echo $output9;
echo $output10;