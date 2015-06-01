command = "/usr/bin/sudo /usr/bin/killall chromium"
import subprocess
process = subprocess.Popen(command.split(), stdout=subprocess.PIPE)
output = process.communicate()[0]
print output