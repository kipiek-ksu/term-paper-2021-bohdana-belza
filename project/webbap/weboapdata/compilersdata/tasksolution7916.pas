var a,s,b:integer;

procedure dec_to_oct(dec:integer;var oct:integer);
var h:array[1..10] of integer;
    j,k,res:integer;
begin
 k:=1;
 while (dec div 8 > 0) do
 begin
  h[k]:=dec mod 8;
  dec:=dec div 8;
  k:=k+1;
 end;
 h[k]:=dec;
 res:=0;
 for j:=k downto 1 do
  res:=res*10+h[j];
 oct:=res;
end;

begin 
read(a);
dec_to_oct(a,s);
write(s);
end.
