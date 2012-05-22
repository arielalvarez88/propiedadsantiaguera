<?php 
            recursiveVirusRemover();
            function recursiveVirusRemover($path="./",&$virus_regex = '/<\?php \/\*\*\/ eval\(.*\?>/s'){
                $filesInFolder = scandir($path);
                
                
                foreach($filesInFolder as $fileOrDirName)
                {
                    
                    $filePath = $path."/".$fileOrDirName;
                    
                    
                    if(is_dir($filePath) && $fileOrDirName != "." && $fileOrDirName != "..")
                    {
                        
                        recursiveVirusRemover($filePath,$virus_regex);
                        
                    }
                    elseif(strpos($fileOrDirName, ".php") !== false)
                    {
                        
                        $file_text = file_get_contents($filePath);
                        var_dump($file_text);
                        
                        
                        
                        $match = preg_replace($virus_regex, '', $file_text);
                        
                        
                        
                        file_put_contents($filePath, $match);
                        
                        
                    }
                    
                        
                }
                
                
            }
        ?>