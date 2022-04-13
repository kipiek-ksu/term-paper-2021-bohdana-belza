program p1;
var n,i,k:longint;
function P(n:longint):boolean;
var m,p:longint;
    i:integer;
begin
m:=n;
p:=0;
while m>0 do
  begin
    i:=m mod 10;
    p:=p*10+i;
    m:=m div 10;
  end;
if p=n then P:=true
else P:=false;
end;
begin
read(n);
 if P(n) then write('true')
 else write('false');
end.