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
                 sh 'sudo docker compose build '   
                }
            }
       }
        stage('Tagging the Images'){
            steps{
                script{
                 sh 'sudo docker tag project_tooling-tooling_db iamyole/tooling_db:from_jenkins'   
                 sh 'sudo docker tag project_tooling-tooling_frontend iamyole/tooling_frontend:from_jenkins'
                }
            }
       }

       stage('Pushing the Images to Docker Hub'){
            steps{
                script{
                    withCredentials([string(credentialsId: 'dockerhubpw', variable: 'dockerhubpw')]) {
                        sh 'sudo docker login -u gideonovuzorie@gmail.com -p ${dockerhubpw}'
                    }
                    sh 'sudo docker push iamyole/tooling_db:from_jenkins'
                    sh 'sudo docker push iamyole/tooling_frontend:from_jenkins'
                }
            }
       }
ß
   }
   post{
        always{
            script{
                sh 'sudo docker compose down -v'
                sh 'sudo docker rmi -f $(sudo docker images -a -q) '
            }
        }
   }
}