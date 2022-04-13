program L_4_25;
var a,b:ineger;
begin
read (a);
case a of
     1,2,3: b:=1
     4,5,6: b:=2
     7,8,9: b:=3
     10,11,12: b:=4
     else write ('Error');
write (b);
end.