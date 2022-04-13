program ss;
 uses crt;
 var x:integer;
  function f(x:integer):string;
 var i:integer; j,r,st:string;
begin
 st:='';
 while x mod 16 <> 0 do begin
  if x mod 16 =10 then
  st:= st+'A' else if x mod 16 = 11 then
  st:= st+'B' else if x mod 16 = 12 then
  st:= st+'C' else if x mod 16 = 13 then
  st:= st+'D' else if x mod 16 = 14 then
  st:= st+'E' else if x mod 16 = 15 then
  st:= st+'F' else begin str(x mod 16,j);st:= st + j;end;
  x:= x div 16;
  end;
 if x<>0 then
 if x=10 then st:= st+'A' else
 if x=11 then st:= st+'B' else
 if x=12 then st:= st+'C' else
 if x=13 then st:= st+'D' else
 if x=14 then st:= st+'E' else
 if x=15 then st:= st+'F' else begin
  str(x,j);st:= st+j;end;
 r:='';
 for i:=length(st) downto 1 do
  r:=r+st[i];
 f:=r;
end;
begin
  read (x);
 writeln (f(x));
end.