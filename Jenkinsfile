pipeline {
   agent {label 'Docker_Server'}

   stages {
       stage('Git Clone') {
           steps {
           git branch: 'master', url: 'https://github.com/iamYole/Tooling-Jenkins-Pipeline.git'
            }
       }
   }
}