from getpass import getpass
import os
import time

def menu():
      while True:
           print("")
           os.system("clear")
           #print('\033[1;36;40m<─────────────── v.1.2 ───────────────>')
           print('')
           #os.system('date | lolcat')
           print("\033[1;93m")
           #print(" \033[1;92m  786 => bismi-llāhir-raḥmānir-raḥīm')")
           print("\033[1;93m")
           #print("  <───────[ Assalamu-Alaikum ]───────>")
           print("")
           try:
                x = str(input('\033[1;92mUsername \033[1;93m: '))
                print("")
                e = getpass('\033[1;92mPassword \033[1;93m: ')
                print ("")
                if x=="muslim" and e=="rahasia123":
                  # print('wait...')
                   #time.sleep(1)
                   os.system('clear')
                   print('')
                   os.system('figlet ' + x + ' | lolcat')
                   print('\033[1;92m ────────────────────────────────────── ')
                   print("")
                   break
                else:
                      os.system("exit")
                      print("")
                      print("")
                      print("")
                      print("\033[1;91m     Wrong Password")
                      time.sleep(2)
                      print("")
                      os.system('exit')
           except Exception:
                      
                      print("")
                      print("")
                      print("")
                      print("")
                      print("")
                      print("\033[1;91m     Wrong Password")
                      time.sleep(2)
                      os.system('exit')
           except KeyboardInterrupt:
                      print("")
                      os.system('exit')
                      print("")
                      print("")
                      print("")
                      print("")
                      print("\033[1;91m     Wrong Password")
                      time.sleep(2)
                      os.system('exit')
menu()
