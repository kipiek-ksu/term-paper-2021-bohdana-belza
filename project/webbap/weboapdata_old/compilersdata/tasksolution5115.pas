program wcg;
var t,j,n,k:longint;
begin
readln(n);
k:=n*10+1;
J:=n;
t:=10;
while j<>0 do begin
  j:=j div 10;
  t:=t*10;
  end;
k:=k+t;
write(k);
end.