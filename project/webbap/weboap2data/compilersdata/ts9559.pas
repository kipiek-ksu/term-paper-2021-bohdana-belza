
const
n=255;
var

i,q,w,e,r,t:integer;
prost:array[1..n] of integer;

begin

e:=1;
r:=0;
for q:=1 to n do begin
r:=0;
for w:=2 to n-1 do
if (q<>w) and (q mod w =  0) then r:=1;


if r=0 then begin

prost[e]:=q;
e:=e+1;
end;
end;

for i:=e downto 2 do  begin
write (prost[i]);
if wherex>70 then write;

end;
read;
end.