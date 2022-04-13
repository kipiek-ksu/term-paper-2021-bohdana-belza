program L_3_35;
type masiv=array[1..100] of real;
var x1,x2,i,n: integer;
    buf,max: real;
    mas: masiv;

begin
 read(x1);
 read(x2);
 for i:=1 to x1+x2 do
  begin
   read(buf);
   mas[i+2]:=buf;
  end;
 mas[1]:=x1;
 mas[2]:=x2;
 
 max:=mas[3];
 n:=3;
 for i:=3 to x1 do
  if max < mas[i] then
   begin
    max:=mas[i];
    n:=i;
   end;
 for i:=n+1 to x1+2 do
  mas[i]:=0.55;
  
 max:=mas[x1+1];
 n:=x1+1;
 for i:=x1+1 to x2 do
  if max < mas[i] then
   begin
    max:=mas[i];
    n:=i;
   end;
 for i:=n+1 to x2+x1+2 do
  mas[i]:=0.55;
  
  
 for i:=3 to x1+x2+2 do 
  write(mas[i]:0:2,' ');

end.