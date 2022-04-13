program Max;
var c,b,a:set of char;
    t:string;
    h,i,r:integer;
begin
 a:=['a','e','i','o','u','y'];
 c:=['B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Z'];
b:=['b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','z'];
read(t);
h:=0;
r:=0;
For i:=1 to length(t) do
if t[i] in a then h:=h+1;
For i:=1 to length(t) do
if t[i] in b then r:=r+1;
For i:=1 to length(t) do
if t[i] in c then r:=r+1;
writeLn (h,'',r);
end.

