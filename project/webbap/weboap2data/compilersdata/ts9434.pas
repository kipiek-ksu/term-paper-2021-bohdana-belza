program z1;
var m:set of char;
    s:string;
    n,i,z:integer;
begin

 m:=['b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v',
 'w','x','z', 'B', 'C', 'D', 'F', 'G', 'H', 'J', 'K',
  'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Z'];
 z:=0;
readln(s);
 n:=length(s);
for i:=1 to n do
 if not(s[i] in m) then z:=i+z;
write(z);
end.