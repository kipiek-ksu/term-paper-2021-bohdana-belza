rogram b1;
   procedure mat(p: integer);
   var i,j,k,s,n:integer;
    a:array[1..n,1..n] of integer;
    b:array[1..n,1..n] of integer;
    c:array[1..n,1..n] of integer;

   begin
   n:=p;
   for j:=1 to n do
   for k:=1 to n do
   begin
   s:=0;
   for i:=1 to n do
   begin
   s:=s+a[k,i]*b[i,j];
   c[k,j]:=s;
   end;
   end;
   for k:=1 to n do
   write(c[k,j]:2);
   end;
   end;
   var p:integer;
                  
 begin
  read(n);
    procedure mat(p);
  end.