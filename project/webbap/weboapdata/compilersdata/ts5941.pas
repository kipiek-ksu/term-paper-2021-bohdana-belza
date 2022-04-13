program l9z8;

type mass=array[1..100] of integer;
Var n,i,k,d:integer;a:mass;s:string;o1,o:byte;
procedure sort(var a:mass );
var i,j,g,c:integer;
  begin
  g:=2;
   while g<=n do
   begin
   i:=a[g];
   j:=g-1;
   while((j>0)and(a[j]>i)) do
   begin
   c:=a[j];
   a[j]:=a[j+1];
   a[j+1]:=c;
   j:=j-1;
   end;
   for i:=1 to n do begin
   write(a[i],' '); end;writeln;
   g:=g+1;

   end;
   o1:=g-1;
  end;
  procedure input(var a:mass);
  var i:word;
  begin
   for i:=1 to n do begin
   read(a[i]); end;
  end;
  procedure output(a:mass);
  var i:word;
  begin
  writeln(o2);
  writeln(o1);

   for i:=1 to n do begin
   write(a[i],' '); end;
  end;
begin
 Readln (n);
 input(a);

 sort (a);
 output(a);
end.