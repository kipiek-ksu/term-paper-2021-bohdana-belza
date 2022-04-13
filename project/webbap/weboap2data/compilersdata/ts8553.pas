program z20;
type Point= ^Item;
     Item=record
     x: char;
     p: Point;
     end;
 var i,w,n,h: integer; a: array[1..100,1..2] of char;
  s: string;g:point;
  l,f: point;d,k,p:boolean;

 procedure deleted(var f:point);
   var Tmp: Point;c:char;i:integer;
   begin
    tmp:=f;
    f:=f^.p;
    dispose(tmp);
    c:=f^.x;
    if f=nil then h:=0 else
    for i:=1 to n do
     if a[i,1]=c then begin h:=i;break; end
   end;

 procedure Add(var F: Point; x: char);
   var g,j:Point; fg: boolean;i,u,o:integer;
   begin
   fg:=false;
    for i:=1 to n do
     if a[i,1]=x then begin p:=false;fg:=true;h:=i;break;end;
     if fg then
        begin
          new(g);
          g^.p:=f;
          g^.x:=x;
          f:=g;
        end
       else
        begin
        fG:=false;
        for o:=1 to n do
     if a[o,2]=x then begin p:=false;fg:=true;u:=o;break;end;
             if (fg)and(x=a[h,2]) then deleted(f) else k:=true;
        end;
   end;
 procedure Out(F: Point);
   var t: Point;
   begin
     t:=F;
     while (t<>NIL) do
       begin
         write(t^.x, ' ');
         t:=t^.p;
       end;
   end;

  begin
       readln(N);
       p:=true;
       for i:=1 to n do
        readln(a[i,1],a[i,2]);
        readln(s);
        d:=false;
        w:=1;
        while not(d)and(w<=length(s)) do
        begin
        for i:=1 to n do
        if s[w]=a[i,1] then begin d:=true;h:=i;break;end;
        w:=w+1;
        end;
        new(g);
        g^.x:=s[w-1];
        g^.p:=nil;
        f:=g;
         for i:=w to length(s) do
            begin
              add(f,s[i]);
            end;

            if (((s='')or(f=nil))and not(k)) then writeln('correct') else writeln('incorrect');
       readln;

  end.
