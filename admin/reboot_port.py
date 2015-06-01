
command = "/usr/bin/sudo /bin/rm /boot/config.txt"
import subprocess
process = subprocess.Popen(command.split(), stdout=subprocess.PIPE)
output = process.communicate()[0]
print output

command = "/usr/bin/sudo /bin/cp /boot/config_port.txt /boot/config.txt"
import subprocess
process = subprocess.Popen(command.split(), stdout=subprocess.PIPE)
output = process.communicate()[0]
print output

command = "/usr/bin/sudo /bin/rm /boot/xinitrc"
import subprocess
process = subprocess.Popen(command.split(), stdout=subprocess.PIPE)
output = process.communicate()[0]
print output

command = "/usr/bin/sudo /bin/cp /boot/xinitrc_port /boot/xinitrc"
import subprocess
process = subprocess.Popen(command.split(), stdout=subprocess.PIPE)
output = process.communicate()[0]
print output

command = "/usr/bin/sudo /sbin/reboot"
import subprocess
process = subprocess.Popen(command.split(), stdout=subprocess.PIPE)
output = process.communicate()[0]
print output