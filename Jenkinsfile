pipeline {
   agent {label 'Docker_Server'}

   stages {
       stage('Inital Clean up'){
           steps {
            dir("${WORKSPACE}") {
              deleteDir()
            }
          }
       }

       stage('Cloning the Tooling Repository') {
           steps {
                git branch: 'master', url: 'https://github.com/iamYole/Tooling-Jenkins-Pipeline.git'
            }
       }

       stage('Building the Images'){
            steps{
                script{
                 sh 'docker compose build '   
                }
            }
       }
        stage('Tagging the Images'){
            steps{
                script{
                 sh 'docker tag tooling-tooling_db iamyole/tooling_db:from_jenkins'   
                 sh 'docker tag tooling-tooling_frontend iamyole/tooling_frontend:from_jenkins'
                }
            }
       }

       stage('Pushing the Images to Docker Hub'){
            steps{
                script{
                    withCredentials([string(credentialsId: 'dockerhubpw', variable: 'dockerhubpw')]) {
                        sh 'docker login -u gideonovuzorie@gmail.com -p ${dockerhubpw}'
                    }
                    sh 'docker push iamyole/tooling_db:from_jenkins'
                    sh 'docker push iamyole/tooling_frontend:from_jenkins'
                }
            }
       }

   }
}