provider "aws" {
    access_key = "AKIAR35OX7YQ3OLX6UYO"
    secret_key = "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"
    region = "us-west-2"
}
module "ec2_instance" {
  source  = "terraform-aws-modules/ec2-instance/aws"
  version = "~> 3.0"
  for_each = toset(["jenkins", "dev", "prod"])
  name = "instance-${each.key}"
  ami                    = "ami-0892d3c7ee96c0bf7"
  instance_type          = "t2.micro"
  key_name               = "mykey"
  monitoring             = true
  vpc_security_group_ids = ["sg-08e345144e01896b6"]
  tags = {
    Terraform   = "true"
    Environment = "dev"
  }
}
resource "aws_db_instance" "default" {
  allocated_storage    = 10
  engine               = "mysql"
  engine_version       = "5.7"
  instance_class       = "db.t3.micro"
  name                 = "devops"
  username             = "Andrew"
  password             = "andrewchangeme"
  parameter_group_name = "default.mysql5.7"
  skip_final_snapshot  = true
}


output "instance_prod_ip_addr" {
  value       =  module.ec2_instance["prod"].public_ip
  description = "The private IP address of the main server instance."
}

output "instance_dev_ip_addr" {
  value       =  module.ec2_instance["dev"].public_ip
  description = "The private IP address of the main server instance."
}

output "instance_jenkins_ip_addr" {
  value       =  module.ec2_instance["jenkins"].public_ip
  description = "The private IP address of the main server instance."
}
