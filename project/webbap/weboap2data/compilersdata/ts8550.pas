Type point=^Item;
     Item=record
                o:boolean;
                zn:integer;
                pred:point;
     end;
Var k:point;
    s:string;
    f:boolean;
    n,i,j:byte;
    m:array[1..256,1..2]of char;
function prov(o:char):boolean;
begin

end;

procedure add(zn:integer; o:boolean; var k:point);
var p:point;
begin
     new(p);
     p^.pred:=k;
     p^.o:=o;
     p^.zn:=zn;
     k:=p;
end;

procedure del(var k:point);
var p:point;
begin
     if k<>nil then
     begin
     p:=k;
     k:=p^.pred;
     dispose(p);
     end;
end;

Begin
     readln(n);
     for i:=1 to n do
         readln(m[i,1],m[i,2]);
     readln(s);
     f:=false;

     j:=1;
     while (j<=n)and(s[1]<>m[j,1]) do j:=j+1;
     if j<=n then
     begin
          k:=nil;
          add(j,true,k);
          i:=2;
          while (i<=length(s))and(f=true) do
          begin
               j:=1;
               while (j<=n) and (s[i]<>m[j,1]) and (s[i]<>m[j,2]) do j:=j+1;
               if s[i]=m[j,1] then add(j,true,k)
               else
               begin
                    if (k^.zn=j)and(s[i]=m[j,2]) then del(k)
                                                 else f:=false;
               end;
               i:=i+1;
          end;
          if k<>nil then f:=false;
     end;
     if f then write('correct')
          else write('incorrect');
End.